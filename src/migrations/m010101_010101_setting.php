<?php

use yii\db\Migration;
use portalium\site\models\Setting;

class m010101_010101_setting extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'category' => $this->string(64)->notNull(),
            'name' => $this->string(64)->notNull(),
            'label' => $this->string(64)->notNull(),
			'value' => $this->string(64),
            'type' => $this->tinyInteger(1)->notNull(),
            'config' => $this->text(),
        ], $tableOptions);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'app::title',
            'label' => 'Title',
            'value' => 'Portalium',
            'type' => Setting::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'app::language',
            'label' => 'Language',
            'value' => 'en-US',
            'type' => Setting::TYPE_DROPDOWNLIST,
            'config' => json_encode([ 'en-US' => 'English','tr-TR' => 'Turkish'])
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'page::home',
            'label' => 'Home Page',
            'value' => '0',
            'type' => Setting::TYPE_DROPDOWNLIST,
            'config' => json_encode([ 0 => 'Please Select'])
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'page::signup',
            'label' => 'Signup Page',
            'value' => '1',
            'type' => Setting::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'page::about',
            'label' => 'About Page',
            'value' => '1',
            'type' => Setting::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'page::login',
            'label' => 'Login Page',
            'value' => '1',
            'type' => Setting::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'page::contact',
            'label' => 'Contact Page',
            'value' => '1',
            'type' => Setting::TYPE_RADIOLIST,
            'config' => json_encode([ 1 => 'Show', 0 => 'Hide'])
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'email::address',
            'label' => 'Email Address',
            'value' => 'info@portalium.dev',
            'type' => Setting::TYPE_INPUT,
            'config' => 'email'
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'email::displayname',
            'label' => 'Email Display Name',
            'value' => 'Portal',
            'type' => Setting::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'smtp::server',
            'label' => 'SMTP Server',
            'value' => 'smtp.gmail.com',
            'type' => Setting::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'smtp::port',
            'label' => 'SMTP Port',
            'value' => '465',
            'type' => Setting::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'smtp::username',
            'label' => 'SMTP Username',
            'value' => '',
            'type' => Setting::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert('setting',[
            'category' => 'site',
            'name' => 'smtp::password',
            'label' => 'SMTP Password',
            'value' => '',
            'type' => Setting::TYPE_INPUTPASSWORD,
            'config' => ''
        ]);

        $this->insert('setting', [
            'category' => 'site',
            'name' => 'smtp::encryption',
            'label' => 'SMTP Encryption',
            'value' => 'ssl',
            'type' => Setting::TYPE_RADIOLIST,
            'config' => json_encode(['ssl' => 'SSL','tls' => 'TLS'])
        ]);

    }

    public function down()
    {
        $this->dropTable('setting');
    }
}
