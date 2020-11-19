<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IpLog extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          	=> [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'IP_ADDR'    	=> [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'ID_HOST'   	=> [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'User'       	=> [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
			],
			'Command'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
			],
			'created_at'    => [
				'type'           => 'DATETIME',
				'null'           => TRUE,
			],
			'updated_at'    => [
				'type'           => 'DATETIME',
				'null'           => TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('TB_Ip_log');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('TB_Ip_log');
	}
}
