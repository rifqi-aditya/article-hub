<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        // Membuat tabel 'articles'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'author'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'content'     => ['type' => 'TEXT'],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'date'        => ['type' => 'DATE'],
            'created_at'  => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at'  => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('articles');
    }

    public function down()
    {
        // Menghapus tabel 'articles' jika migrasi dibatalkan
        $this->forge->dropTable('articles');
    }
}
