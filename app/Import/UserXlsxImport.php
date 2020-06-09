<?php
/**
 * Created by PhpStorm.
 * User: rainapp
 * Date: 6/7/20
 * Time: 3:48 PM
 */

namespace App\Import;


use App\Education;
use App\Membership;
use App\Profile;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Matrix\Exception;
use Psy\Util\Str;

class UserXlsxImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    var $slugs = [];
    var $mail = [];
    var $mob = [];

    var $repeat = [];

    var $users=[];
    var $pro=[];
    var $edu=[];
    var $membership=[];

    public function model(array $row)
    {
        $file = fopen(public_path('txt.txt'),'w');

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 960);

        if ($row[0] == "end") {
            echo "end , ";

            $i =0;
            $j = 0;
            foreach ($this->slugs as $sl){
                foreach ($this->slugs as $sl2){
                    if ($i != $j && $sl == $sl2) {
                        array_push($this->repeat, $sl2);
                        echo $sl2;
                        echo "<br>";
                    }

                    $j++;
                }
                $j=0;
                $i++;
            }

            $i =0;
            $j = 0;
            foreach ($this->mail as $ml){
                foreach ($this->mail as $ml2){
                    if ($i != $j && $ml == $ml2) {
                        array_push($this->repeat, $ml2);
                        echo $ml2;
                        echo "<br>";
                    }
                    $j++;
                }
                $j=0;
                $i++;
            }

            $i =0;
            $j = 0;
            foreach ($this->mob as $mb){
                foreach ($this->mob as $mb2){
                    if ($i != $j && $mb == $mb2) {
                        array_push($this->repeat, $mb2);
                        echo $mb2;
                        echo "<br>";
                    }


                    $j++;
                }
                $j=0;
                $i++;
            }


            var_dump($this->repeat);

            fclose($file);
            exit();
        } else if ($row[0] == "ردیف") {
             $file = fopen(public_path('txt.txt'),'w');
//            \DB::disableQueryLog();
            return null;
        }

        $main = $memberType = 0;

        switch ($row[4]) {
            case "M":
                $memberType = 1;
                $main = 1;
                break;
            case "S":
                $memberType = 3;
                break;
            case "A":
                $memberType = 1;
                break;

        }


        $jdate = $row[2] == null ? new \Morilog\Jalali\Jalalian(1376, 10, 26) : new \Morilog\Jalali\Jalalian(explode('/', $row[2])[0], explode('/', $row[2])[1], explode('/', $row[2])[2]);

//        dd($jdate->toCarbon()->timestamp , time());
        $slug = "";
        $i = 1;
        if ($row[37] != null) {
            foreach (explode(" ", $row[37]) as $slg) {

                $slug .= $slg . ($i == count(explode(" ", $row[37])) ? "" : "-");

                $i++;
            }

            foreach (explode(" ", $row[38]) as $slgg) {

                $slug .= "-" . $slgg;

                $i++;
            }
        } else {
            $slug = mt_rand(0, 999999999999999999);
        }



        array_push($this->slugs,$slug);
        array_push($this->mail,$row[10] == null ? mt_rand(0, 999999999999999999) . "@g.com" : $row[10]);
        array_push($this->mob, $row[8] == null ? mt_rand(0, 999999999999999999) : $row[8]);

        User::create([
            'first_name' => $row[6] ?? " ",
            'last_name' => $row[7] ?? " ",
            'email' => $row[10] == null ? mt_rand(0, 999999999999999999) . "@g.com" : $row[10],
            'mobile' => $row[8] == null ? mt_rand(0, 999999999999999999) : $row[8],
            'password' => \Hash::make($row[8]),
            "expire" => $jdate->toCarbon()->timestamp,
            "active" => (int)($jdate->toCarbon()->timestamp >= time()),
            'name_en' => $row[37] . " " . $row[38],
            'slug' => $slug,
            'user_code' => $row[3] . "-" . $row[4],
            'membership_type_id' => $memberType,
            'main' => $main,
        ])

        fwrite($file,json_encode([
            'first_name' => $row[6] ?? " ",
            'last_name' => $row[7] ?? " ",
            'email' => $row[10] == null ? mt_rand(0, 999999999999999999) . "@g.com" : $row[10],
            'mobile' => $row[8] == null ? mt_rand(0, 999999999999999999) : $row[8],
            'password' => \Hash::make($row[8]),
            "expire" => $jdate->toCarbon()->timestamp,
            "active" => (int)($jdate->toCarbon()->timestamp >= time()),
            'name_en' => $row[37] . " " . $row[38],
            'slug' => $slug,
            'user_code' => $row[3] . "-" . $row[4],
            'membership_type_id' => $memberType,
            'main' => $main,
        ])."\n");

        fwrite($file,json_encode([
            "sex" => (int)($row[35] == null),
            'father_name' => $row[18],
            "certificate_number" => $row[19],
            'national_code' => $row[20],
            'birth_date' => $row[21] . '/' . $row[22] . "/" . $row[23],
            'receive_place' => $row[11] == null ? 0 : ($row == "محل کار"),
            'home_address' => $row[13],
            'work_tel' => $row[15],
            'home_tel' => $row[16],
            'work_address' => $row[14],
            'specialized_basins' => $row[25],
        ])."\n");

        $grade = $row[27] == null ? " " : (explode(' ', $row[27])[0] ? (count(explode(' ', $row[27])) > 1) ? explode(' ', $row[27])[1] : " " : explode(' ', $row[27])[0]);
        fwrite($file,json_encode([
            'education_place' => "",
            'gpa' => "0",
            'from_date' => "1300/01/01",
            'to_date' => "1300/01/01",
            "grade" => $grade,
            "field_of_study" => $row[27] ?? " ",
        ])."\n");


        fwrite($file,json_encode([
                'membership_type_id' => $memberType,
                'year' => 1,
                'lang_id' => 1
            ])."\n----------------------------------\n");




        return null;

    }


    public function checkUniq(array $row)
    {

    }

}