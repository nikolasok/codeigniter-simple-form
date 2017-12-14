<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cities_table extends CI_Migration
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
                'city' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                )
            )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cities');
    }

    public function down()
    {
        $this->dbforge->drop_table('cities');
    }
}