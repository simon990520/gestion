<?php

use App\Dependencias;
use App\Permisos;
use App\Serie;
use App\SubSeries;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>   'SenaComm',
            'email'=>   'senacomm@gmail.com',
            'password'=>Hash::make('sena1234'),
        ]);
        Permisos::create([
            'ndependencias' => '0',
            'cdependencias' => '0',
            'edependencias' => '0',
            'ddependencias' => '0',
            'nseries' => '0',
            'cseries' => '0',
            'eseries' => '0',
            'dseries' => '0',
            'nsubseries' => '0',
            'csubseries' => '0',
            'esubseries' => '0',
            'dsubseries' => '0',
            'nusuarios' => '0',
            'cusuarios' => '0',
            'eusuarios' => '0',
            'dusuarios' => '0',
            'user_id' => '1'
        ]);
        /*Dependencias::create([
            'nombreDependencias' => 'Despacho subdirector',
            'codigoDependencias' => '1060',
        ]);
        Serie::create([
            'dependencias_id' =>'1',
            'nombreSeries' =>'PETICIONES, QUEJAS Y RECLAMOS',
            'codigoSeries' =>'162',
            'original' =>'',
            'copia' =>'1',
            'soporte' =>'',
            'gestion' =>'0',
            'central' =>'5',
            'ctfisico' =>'',
            'ctelectronico' =>'1',
            'microfilmacion' =>'1',
            'digitalizacion' =>'',
            'seleccion' =>'',
            'eliminacion' =>'1',
            'estado' => '1',
        ]);
        Serie::create([
            'dependencias_id' =>'1',
            'nombreSeries' =>'CONVENIOS',
            'codigoSeries' =>'41',
            'original' =>'1',
            'copia' =>'',
            'soporte' =>'',
            'gestion' =>'1',
            'central' =>'2',
            'ctfisico' =>'1',
            'ctelectronico' =>'',
            'microfilmacion' =>'1',
            'digitalizacion' =>'',
            'seleccion' =>'1',
            'eliminacion' =>'',
            'estado' => '3',
        ]);
        Serie::create([
            'dependencias_id' =>'1',
            'nombreSeries' =>'INFORMES',
            'codigoSeries' =>'140',
            'original' =>'',
            'copia' =>'1',
            'soporte' =>'',
            'gestion' =>'1',
            'central' =>'3',
            'ctfisico' =>'1',
            'ctelectronico' =>'',
            'microfilmacion' =>'1',
            'digitalizacion' =>'',
            'seleccion' =>'1',
            'eliminacion' =>'1',
            'estado' => '3',
        ]);
        Serie::create([
            'dependencias_id' =>'1',
            'nombreSeries' =>'UNIDADES PRODUCTIVAS',
            'codigoSeries' =>'221',
            'original' =>'',
            'copia' =>'1',
            'soporte' =>'',
            'gestion' =>'1',
            'central' =>'3',
            'ctfisico' =>'1',
            'ctelectronico' =>'',
            'microfilmacion' =>'1',
            'digitalizacion' =>'',
            'seleccion' =>'1',
            'eliminacion' =>'1',
            'estado' => '2',
        ]);
        SubSeries::create([
            'serie_id' =>'1',
            'nombreSubSeries' =>'peticiones, quejas y reclamos',
            'codigoSubSeries' =>'162',
            'originalSubSeries' =>'',
            'copiaSubSeries' =>'1',
            'soporteSubSeries' =>'',
            'gestionSubSeries' =>'0',
            'centralSubSeries' =>'5',
            'ctfisicoSubSeries' =>'',
            'ctelectronicoSubSeries' =>'1',
            'microfilmacionSubSeries' =>'1',
            'digitalizacionSubSeries' =>'',
            'seleccionSubSeries' =>'',
            'eliminacionSubSeries' =>'1',
            'estado' => '1',
        ]);*/
    }
}
