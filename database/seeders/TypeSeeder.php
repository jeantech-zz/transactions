<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type= new Type();
        $type->type_info="account";
        $type->name="checking";
        $type->save();

        $type1= new Type();
        $type1->type_info="account";
        $type1->name="saving";
        $type1->save();

        $type2= new Type();
        $type2->type_info="identification";
        $type2->name="C.C.";
        $type2->save();

        $type3= new Type();
        $type3->type_info="identification";
        $type3->name="Card Identification";
        $type3->save();

        $type4= new Type();
        $type4->type_info="identification";
        $type4->name="Passport";
        $type4->save();

        $type5= new Type();
        $type5->type_info="transaction";
        $type5->name="Withdrawal";
        $type5->save();

        $type6= new Type();
        $type6->type_info="transaction";
        $type6->name="consignment";
        $type6->save();
    }
}
