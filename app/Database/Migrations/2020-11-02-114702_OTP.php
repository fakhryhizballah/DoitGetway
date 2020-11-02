<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OTP extends Migration
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
			'ID_User'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Nama_Depan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Nama_Belakang'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
			],
			'Password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Saldo'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Link'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'Status'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
				'null'           => TRUE,
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
		$this->forge->createTable('OTP');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('TB_User');
	}
}
