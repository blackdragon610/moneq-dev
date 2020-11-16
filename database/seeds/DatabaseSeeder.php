<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            "admin_name" => "テスト",
            "login_id" => "admin",
            "email" => "makoto@tejima.jp",
            "password" => bcrypt("test"),
        ]);

        $categories = [
            ["name" => "資産運用", "slash" => "asset"],
            ["name" => "保険", "slash" => "insurance"],
            ["name" => "税金", "slash" => "tax"],
            ["name" => "老後", "slash" => "retirement"],
            ["name" => "生活", "slash" => "life"],
            ["name" => "仕事", "slash" => "job"],
            ["name" => "その他", "slash" => "other"],
        ];

        DB::table('categories')->truncate();


        foreach ($categories as $category){
            DB::table('categories')->insert([
                "category_name" => $category["name"],
                "slash" => $category["slash"]
            ]);
        }

        $subCategories = [
            ["name" => "お金の貯め方全般", "parent_slash" => "asset", "slash" => "all"],
            ["name" => "貯金・預金・定期預金・外貨預金・積立", "parent_slash" => "asset", "slash" => "savings"],
            ["name" => "株式投資・NISA・投資信託・ETF・REIT", "parent_slash" => "asset", "slash" => "investment"],
            ["name" => "FX・金投資・CFD・先物取引・仮想通貨", "parent_slash" => "asset", "slash" => "fx"],
            ["name" => "不動産投資・賃貸経営", "parent_slash" => "asset", "slash" => "realestate"],
            ["name" => "その他資産運用", "parent_slash" => "asset", "slash" => "other"],

            ["name" => "保険全般", "parent_slash" => "insurance", "slash" => "all"],
            ["name" => "生命保険・終身保険", "parent_slash" => "insurance", "slash" => "life"],
            ["name" => "医療保険・がん保険", "parent_slash" => "insurance", "slash" => "medical"],
            ["name" => "自動車保険・火災保険・地震保険", "parent_slash" => "insurance", "slash" => "car"],
            ["name" => "その他保険", "parent_slash" => "insurance", "slash" => "other"],

            ["name" => "税金・公的手当・給付金・補助金・助成金", "parent_slash" => "tax", "slash" => "all"],

            ["name" => "老後のお金全般", "parent_slash" => "retirement", "slash" => "all"],
            ["name" => "年金・個人年金・iDeco", "parent_slash" => "retirement", "slash" => "pension"],
            ["name" => "相続・介護", "parent_slash" => "retirement", "slash" => "inheritance"],
            ["name" => "退職金", "parent_slash" => "retirement", "slash" => "severance"],

            ["name" => "家計全般・ライフプラン・家計簿・節約", "parent_slash" => "life", "slash" => "all"],
            ["name" => "住まい選び・マイホーム・住宅ローン", "parent_slash" => "life", "slash" => "home"],
            ["name" => "車・マイカーローン・カーシェア", "parent_slash" => "life", "slash" => "car"],
            ["name" => "結婚・離婚・出産・教育・子育て", "parent_slash" => "life", "slash" => "marriage"],
            ["name" => "クレジットカード・デビットカード・電子マネー・ポイント・QR決済", "parent_slash" => "life", "slash" => "card"],
            ["name" => "金銭トラブル", "parent_slash" => "life", "slash" => "trouble"],
            ["name" => "カードローン・キャッシング・借金全般", "parent_slash" => "life", "slash" => "loan"],
            ["name" => "ペット・ペット保険", "parent_slash" => "life", "slash" => "pet"],

            ["name" => "仕事全般・転職・退職", "parent_slash" => "job", "slash" => "all"],
            ["name" => "副業", "parent_slash" => "job", "slash" => "sidebusiness"],
            ["name" => "起業・独立", "parent_slash" => "job", "slash" => "ownbusiness"],

            ["name" => "上記に該当するものはない", "parent_slash" => "other", "slash" => "all"],
        ];

        DB::table('sub_categories')->truncate();

        foreach ($subCategories as $category){
            DB::table('sub_categories')->insert([
                "sub_name" => $category["name"],
                "parent_slash" => $category["parent_slash"],
                "slash" => $category["slash"]
            ]);
        }

        DB::table('specialties')->truncate();


        $specialties = [
            "1" => "ライフプラン・家計相談",
            "2" => "住宅ローン・不動産",
            "3" => "老後・年金",
            "4" => "税金対策",
            "5" => "保険",
            "6" => "資産運用・投資",
        ];

        foreach ($specialties as $value){
            DB::table('specialties')->insert([
                "specialtie_name" => $value,
            ]);
        }
    }
}
