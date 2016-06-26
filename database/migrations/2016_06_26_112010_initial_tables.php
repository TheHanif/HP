<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement('drop table users');
        DB::statement("CREATE TABLE areas (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) NOT NULL,
          city_id int(1) NOT NULL,
          status int(1) NOT NULL,
          created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
        
        DB::statement("CREATE TABLE cities (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          provice_id int(1) DEFAULT '0',
          status int(1) DEFAULT '1',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE customerAddresses (
          id int(11) NOT NULL AUTO_INCREMENT,
          customer_id int(1) DEFAULT '0',
          area_id int(1) DEFAULT '0',
          city_id int(1) DEFAULT '0',
          province_id int(1) DEFAULT '0',
          address varchar(128) DEFAULT NULL,
          near_by_place varchar(128) DEFAULT NULL,
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE customers (
          id int(11) NOT NULL AUTO_INCREMENT,
          full_name varchar(128) DEFAULT NULL,
          email varchar(128) DEFAULT NULL,
          mobile varchar(128) DEFAULT NULL,
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
        
        DB::statement("CREATE TABLE inventory (
          id int(11) NOT NULL AUTO_INCREMENT,
          inventory_item_id int(11) DEFAULT '0',
          quantity int(11) DEFAULT '0',
          rate decimal(10,0) DEFAULT '0',
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE inventoryItems (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE optionItemInventoryItems (
          id int(11) NOT NULL AUTO_INCREMENT,
          option_item_id int(11) DEFAULT '0',
          inventory_item_id int(11) DEFAULT '0',
          quantity decimal(10,0) DEFAULT '0',
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE optionItems (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          option_id int(1) DEFAULT '0',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
        
        DB::statement("CREATE TABLE options (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          status int(1) DEFAULT '0',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE orderProductOptionItems (
          id int(11) NOT NULL AUTO_INCREMENT,
          order_id int(11) DEFAULT '0',
          product_id int(11) DEFAULT '0',
          option_item_id int(11) DEFAULT '0',
          quantity int(11) DEFAULT '0',
          cost decimal(10,0) DEFAULT '0',
          price decimal(10,0) DEFAULT '0',
          sold_at decimal(10,0) DEFAULT '0',
          discount decimal(10,0) DEFAULT '0',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE orderProducts (
          id int(11) NOT NULL AUTO_INCREMENT,
          order_id int(11) DEFAULT '0',
          product_id int(11) DEFAULT '0',
          quantity int(11) DEFAULT '0',
          cost decimal(10,0) DEFAULT '0',
          price decimal(10,0) DEFAULT '0',
          sold_at decimal(10,0) DEFAULT '0',
          discount decimal(10,0) DEFAULT '0',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE orders (
          id int(11) NOT NULL AUTO_INCREMENT,
          number varchar(128) DEFAULT NULL,
          customer_id varchar(128) DEFAULT NULL,
          status varchar(1) DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE productGroups (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE productInventoryItems (
          id int(11) NOT NULL AUTO_INCREMENT,
          product_id int(11) DEFAULT '0',
          inventory_item_id int(11) DEFAULT '0',
          quantity decimal(10,0) DEFAULT '0',
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE productOptionItems (
          id int(11) NOT NULL AUTO_INCREMENT,
          product_options_id int(11) DEFAULT '0',
          price decimal(10,0) DEFAULT '0',
          status int(1) DEFAULT '0',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE productOptions (
          id int(11) NOT NULL AUTO_INCREMENT,
          product_id int(11) DEFAULT '0',
          option_id int(11) DEFAULT '0',
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE products (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          status int(1) DEFAULT '0',
          group_id int(11) DEFAULT '0',
          cost decimal(10,0) DEFAULT '0',
          price decimal(10,0) DEFAULT '0',
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        DB::statement("CREATE TABLE provices (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(128) DEFAULT NULL,
          created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at timestamp NULL DEFAULT NULL,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('areas');
        Schema::drop('cities');
        Schema::drop('customerAddresses');
        Schema::drop('customers');
        Schema::drop('inventory');
        Schema::drop('inventoryItems');
        Schema::drop('optionItemInventoryItems');
        Schema::drop('optionItems');
        Schema::drop('options');
        Schema::drop('orderProductOptionItems');
        Schema::drop('orderProducts');
        Schema::drop('orders');
        Schema::drop('productGroups');
        Schema::drop('productInventoryItems');
        Schema::drop('productOptionItems');
        Schema::drop('productOptions');
        Schema::drop('products');
        Schema::drop('provices');
    }
}
