<?php
    namespace App\Libs;

    use DateTimeImmutable;
    use Illuminate\Support\Facades\Auth;

    /**
    * カレンダーのクラス
    */
    class CalendarClass
    {
        public string $dateStart;
        public string $dateEnd;

        /**
         * 前月の終わり翌月の初めが混ざる場合の処理
         * @param  string  $date
         * @param  bool  $isStartMonday
         * @return array
         * @throws \Exception
         */
        public function getDateStartEnd(string $date, bool $isStartMonday = true) : array
        {
            $dateStart = datetime("Y-m-01", $date);
            $dateEnd = datetime("Y-m-t", $date);
            $weekFirst = intval(datetime("w", $dateStart));
            $weekEnd = intval(datetime("w", $dateEnd));

            if ($isStartMonday){
                $weekFirst = changeWeek($weekFirst);
                $weekEnd = changeWeek($weekEnd);
            }


            if ($weekFirst > 0){
                $dateTime = new DateTimeImmutable($dateStart . " 00:00:00");

                $hosei = -1;

                if (!$isStartMonday)
                {
                    $hosei = 0;
                }


                $dateStart = $dateTime->modify("-" . ($weekFirst + $hosei) . " day")->format("Y-m-d 00:00:00");

            }
            if ($weekEnd < 7){
                $hosei = 7;

                if (!$isStartMonday)
                {
                    $hosei = 6;
                }


                $dateTime = new DateTimeImmutable($dateEnd . " 00:00:00");
                $dateEnd = $dateTime->modify("+" . (($hosei - $weekEnd)) . " day")->format("Y-m-d 23:59:59");
            }

            $this->dateStart = $dateStart;
            $this->dateEnd = $dateEnd;


            return [$dateStart, $dateEnd];

        }


        /**
         * カレンダー情報を取得
         * @param  array  $reservation  予約データ
         * @return mixed
         */
        public function getCalendarDate(array $reservations = [])
        {
            for ($i = strtotime($this->dateStart); $i <= strtotime($this->dateEnd); $i+=3600*24)
            {
                $date = date("Y-m-d", $i);

                if (isset($reservations[$date]))
                {

                    foreach ($reservations[$date] as $key => $reservation){

                        if ($reservation->chat){
                            $PushType = app("PushType");
                            $count = $PushType->getBadge(Auth::user()->id, $reservation->chat->serial, "reservation");

                            if ($count){
                                $results[$date]["badge"] = $count;
                            }
                        }
                    }

                    $results[$date]["result_number"] = count($reservations[$date]);
                    $results[$date]["datas"] = $reservations[$date];
                }else{
                    $results[$date]["result_number"] = 0;
                    $results[$date]["datas"] = "";
                }

                $results[$date]["week"] = datetime("w", $date);
                $results[$date]["day"] = intval(datetime("d", $date));
            }

            return  $results;

        }
    }
