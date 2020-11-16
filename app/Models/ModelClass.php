<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Support\Facades\DB;
    use PhpParser\Builder;

    class ModelClass extends Authenticatable{

        public function setTransaction(string $error, $func){
            DB::beginTransaction();
            try {
                $func();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();

                \Log::Info($e);

                echo $error;
                dd($e);
            }


        }

        /**
         *  パスワード形式に保存
         */
        public function changePassword()
        {

            if (!empty($this->password)){
                $this->password = bcrypt($this->password);
            }else{
                unset($this->password);
            }

        }

        /**
         * トークンの取得
         * @return false|string
         */
        public function getToken()
        {
            return substr(md5(uniqid(rand(),1)), 0, 30);
        }

        /**
         * セッションの保存
         * @param  array  $datas
         * @return array
         */
        public function setSession(array $datas) : array
        {
            $tableName = $this->getTable();

            \Session::put("session_" . $tableName, $datas);

            return $datas;
        }

        /**
         * セッションの保存
         */
        public function getSession() : array
        {
            $tableName = $this->getTable();

            $datas = \Session::get("session_" . $tableName);

            return $datas;
        }

        /**
         * 保存しているデータをモデルに設定
         */
        public function setModel(array $datas)
        {
            $tableName = $this->getTable();

            $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($tableName);

            foreach ($columns as $column){
                if (!empty($datas[$column])){
                    $this->$column = $datas[$column];
                }
            }



        }
    }
