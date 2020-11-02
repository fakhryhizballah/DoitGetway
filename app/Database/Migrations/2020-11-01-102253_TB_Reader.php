<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBReader extends Migration
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
			'ID_Reader'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'ID_Card'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Info'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Command'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Nominal'       => [
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
		$this->forge->createTable('TB_Reader');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('TB_Histori');
	}
}
