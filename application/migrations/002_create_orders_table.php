<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_orders_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ),
                'city_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                ),
                'street' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ),
                'house_number' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '10'
                ),
                'apartment_number' => array(
                    'type' => 'INT',
                    'constraint' => 5
                )
            )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (city_id) REFERENCES cities(id)');
        $this->dbforge->create_table('orders');
    }

    public function down()
    {
        $this->dbforge->drop_table('orders');
    }
}