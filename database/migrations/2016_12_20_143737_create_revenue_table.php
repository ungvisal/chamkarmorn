<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueTable extends Migration
{

    public function up(){
        Schema::create("revenue",function(Blueprint $table){
            $table->increments('id');
            $table->string('dec_cuo_cod');
            $table->string('dec_typ');
            $table->string('dec_yer');
            $table->string('dec_nbr');
            $table->timestamp('dec_dat')->nullable();
            $table->string('recp_nbr');
            $table->timestamp('recp_dat')->nullable();
            $table->string('owner_nam');
            $table->string('gender');
            $table->string('nationality');
            $table->string('passport_id');
            $table->string('address');
            $table->string('company_vat');
            $table->string('company_nam');
            $table->string('seizure_nbr')->nullable();
            $table->timestamp('seizure_dat')->nullable();
            $table->string('decision_nbr')->nullable();
            $table->timestamp('decision_dat')->nullable();
            $table->string('hs_cod');
            $table->string('goods_desc');
            $table->float('gross_mass');
            $table->float('net_mass');
            $table->integer('exc_rate');
            $table->float('item_price');
            $table->float('customs_value');
            $table->string('supp_unit');
            $table->integer('supp_qty');
            $table->string('vehicle_nbr')->nullable();
            $table->timestamp('vehicle_dat')->nullable();
            $table->string('vignette')->nullable();
            $table->string('chassis_nbr')->nullable();
            $table->string('engine_nbr')->nullable();
            $table->string('manufacture_yer')->nullable();
            $table->integer('cylinder')->nullable();
            $table->string('steer')->nullable();
            $table->string('stamp')->nullable();
            $table->integer('cop')->nullable();
            $table->integer('sop')->nullable();
            $table->integer('vop')->nullable();
            $table->integer('atp')->nullable();
            $table->integer('cpp')->nullable();
            $table->integer('spp')->nullable();
            $table->integer('vpp')->nullable();
            $table->integer('vvf')->nullable();
            $table->integer('pim')->nullable();
            $table->integer('ofs')->nullable();
            $table->integer('total_duty_tax')->nullable();
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_to')->nullable();
        });
    }

    public function down(){
        Schema::drop("revenue");
    }

}
