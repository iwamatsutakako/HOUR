<?php

namespace Fuel\Migrations;

class Create_candidates
{
	public function up()
	{
		\DBUtil::create_table('candidates', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'from' => array('type' => 'datetime'),
			'to' => array('type' => 'datetime'),
			'event_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('candidates');
	}
}