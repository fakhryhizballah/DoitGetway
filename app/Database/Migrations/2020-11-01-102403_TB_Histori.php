<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBHistori extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'ID_User_Card'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'To_Name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
			],
			'Status'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
			],
			'Mod_Trans'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Ket'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
			],
			'Nominal'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'ID_Trans'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],

			'created_at'       => [
				'type'           => 'DATETIME',
				'null'           => TRUE,
			],
			'updated_at'       => [
				'type'           => 'DATETIME',
				'null'           => TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('TB_Histori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('TB_Histori');
	}
}
