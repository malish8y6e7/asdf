<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('UserTableSeeder');
	}
}


   class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tbl_usuarios')->delete();

        User::create(array(
                'id_usuario'  => '123',
                'nombre_user' => 'admin',
                'password'    => 'admin',
                'email'       => 'admin@admin.cl',
                'fono'        => '0',
                'perfil'      => '1',
                
        ));

        DB::table('tbl_horario')->delete();

        Horario::create(array(
                'id_horario'  => '1',
                'hora_inicio' => '08:15',
                'hora_fin'    => '09:35',
                
        ));

        Horario::create(array(
                'id_horario'  => '2',
                'hora_inicio' => '09:45',
                'hora_fin'    => '11:05',
                
        ));

                Horario::create(array(
                'id_horario'  => '3',
                'hora_inicio' => '11:15',
                'hora_fin'    => '12:35',
                
        ));

                Horario::create(array(
                'id_horario'  => '4',
                'hora_inicio' => '12:45',
                'hora_fin'    => '14:05',
                
        ));

                Horario::create(array(
                'id_horario'  => '5',
                'hora_inicio' => '14:15',
                'hora_fin'    => '15:35',
                
        ));
                Horario::create(array(
                'id_horario'  => '6',
                'hora_inicio' => '15:45',
                'hora_fin'    => '17:05',
                
        ));

                Horario::create(array(
                'id_horario'  => '7',
                'hora_inicio' => '17:15',
                'hora_fin'    => '18:35',
                
        ));
                Horario::create(array(
                'id_horario'  => '8',
                'hora_inicio' => '19:00',
                'hora_fin'    => '20:30',
                
        ));
                Horario::create(array(
                'id_horario'  => '9',
                'hora_inicio' => '20:45',
                'hora_fin'    => '22:15',
                
        ));
        
    }
}