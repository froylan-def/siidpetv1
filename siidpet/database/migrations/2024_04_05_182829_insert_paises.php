<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        $paises = [
            ['nombre' => 'Afganistán'],
            ['nombre' => 'Albania'],
            ['nombre' => 'Alemania'],
            ['nombre' => 'Andorra'],
            ['nombre' => 'Angola'],
            ['nombre' => 'Antigua y Barbuda'],
            ['nombre' => 'Arabia Saudita'],
            ['nombre' => 'Argelia'],
            ['nombre' => 'Argentina'],
            ['nombre' => 'Armenia'],
            ['nombre' => 'Australia'],
            ['nombre' => 'Austria'],
            ['nombre' => 'Azerbaiyán'],
            ['nombre' => 'Bahamas'],
            ['nombre' => 'Bangladés'],
            ['nombre' => 'Barbados'],
            ['nombre' => 'Baréin'],
            ['nombre' => 'Bélgica'],
            ['nombre' => 'Belice'],
            ['nombre' => 'Benín'],
            ['nombre' => 'Bielorrusia'],
            ['nombre' => 'Birmania'],
            ['nombre' => 'Bolivia'],
            ['nombre' => 'Bosnia y Herzegovina'],
            ['nombre' => 'Botsuana'],
            ['nombre' => 'Brasil'],
            ['nombre' => 'Brunéi'],
            ['nombre' => 'Bulgaria'],
            ['nombre' => 'Burkina Faso'],
            ['nombre' => 'Burundi'],
            ['nombre' => 'Bután'],
            ['nombre' => 'Cabo Verde'],
            ['nombre' => 'Camboya'],
            ['nombre' => 'Camerún'],
            ['nombre' => 'Canadá'],
            ['nombre' => 'Catar'],
            ['nombre' => 'Chad'],
            ['nombre' => 'Chile'],
            ['nombre' => 'China'],
            ['nombre' => 'Chipre'],
            ['nombre' => 'Ciudad del Vaticano'],
            ['nombre' => 'Colombia'],
            ['nombre' => 'Comoras'],
            ['nombre' => 'Corea del Norte'],
            ['nombre' => 'Corea del Sur'],
            ['nombre' => 'Costa de Marfil'],
            ['nombre' => 'Costa Rica'],
            ['nombre' => 'Croacia'],
            ['nombre' => 'Cuba'],
            ['nombre' => 'Dinamarca'],
            ['nombre' => 'Dominica'],
            ['nombre' => 'Ecuador'],
            ['nombre' => 'Egipto'],
            ['nombre' => 'El Salvador'],
            ['nombre' => 'Emiratos Árabes Unidos'],
            ['nombre' => 'Eritrea'],
            ['nombre' => 'Eslovaquia'],
            ['nombre' => 'Eslovenia'],
            ['nombre' => 'España'],
            ['nombre' => 'Estados Unidos'],
            ['nombre' => 'Estonia'],
            ['nombre' => 'Etiopía'],
            ['nombre' => 'Filipinas'],
            ['nombre' => 'Finlandia'],
            ['nombre' => 'Fiyi'],
            ['nombre' => 'Francia'],
            ['nombre' => 'Gabón'],
            ['nombre' => 'Gambia'],
            ['nombre' => 'Georgia'],
            ['nombre' => 'Ghana'],
            ['nombre' => 'Granada'],
            ['nombre' => 'Grecia'],
            ['nombre' => 'Guatemala'],
            ['nombre' => 'Guyana'],
            ['nombre' => 'Guinea'],
            ['nombre' => 'Guinea ecuatorial'],
            ['nombre' => 'Guinea-Bisáu'],
            ['nombre' => 'Haití'],
            ['nombre' => 'Honduras'],
            ['nombre' => 'Hungría'],
            ['nombre' => 'India'],
            ['nombre' => 'Indonesia'],
            ['nombre' => 'Irak'],
            ['nombre' => 'Irán'],
            ['nombre' => 'Irlanda'],
            ['nombre' => 'Islandia'],
            ['nombre' => 'Islas Marshall'],
            ['nombre' => 'Islas Salomón'],
            ['nombre' => 'Israel'],
            ['nombre' => 'Italia'],
            ['nombre' => 'Jamaica'],
            ['nombre' => 'Japón'],
            ['nombre' => 'Jordania'],
            ['nombre' => 'Kazajistán'],
            ['nombre' => 'Kenia'],
            ['nombre' => 'Kirguistán'],
            ['nombre' => 'Kiribati'],
            ['nombre' => 'Kuwait'],
            ['nombre' => 'Laos'],
            ['nombre' => 'Lesoto'],
            ['nombre' => 'Letonia'],
            ['nombre' => 'Líbano'],
            ['nombre' => 'Liberia'],
            ['nombre' => 'Libia'],
            ['nombre' => 'Liechtenstein'],
            ['nombre' => 'Lituania'],
            ['nombre' => 'Luxemburgo'],
            ['nombre' => 'Macedonia del Norte'],
            ['nombre' => 'Madagascar'],
            ['nombre' => 'Malasia'],
            ['nombre' => 'Malaui'],
            ['nombre' => 'Maldivas'],
            ['nombre' => 'Maldivas'],
            ['nombre' => 'Malta'],
            ['nombre' => 'Marruecos'],
            ['nombre' => 'Mauricio'],
            ['nombre' => 'Mauritania'],
            ['nombre' => 'México'],
            ['nombre' => 'Micronesia'],
            ['nombre' => 'Moldavia'],
            ['nombre' => 'Mónaco'],
            ['nombre' => 'Mongolia'],
            ['nombre' => 'Montenegro'],
            ['nombre' => 'Mozambique'],
            ['nombre' => 'Namibia'],
            ['nombre' => 'Nauru'],
            ['nombre' => 'Nepal'],
            ['nombre' => 'Nicaragua'],
            ['nombre' => 'Níger'],
            ['nombre' => 'Nigeria'],
            ['nombre' => 'Noruega'],
            ['nombre' => 'Nueva Zelanda'],
            ['nombre' => 'Omán'],
            ['nombre' => 'Países Bajos'],
            ['nombre' => 'Pakistán'],
            ['nombre' => 'Palaos'],
            ['nombre' => 'Panamá'],
            ['nombre' => 'Papúa Nueva Guinea'],
            ['nombre' => 'Paraguay'],
            ['nombre' => 'Perú'],
            ['nombre' => 'Polonia'],
            ['nombre' => 'Portugal'],
            ['nombre' => 'Reino Unido'],
            ['nombre' => 'República Centroafricana'],
            ['nombre' => 'República Checa'],
            ['nombre' => 'República del Congo'],
            ['nombre' => 'República Democrática del Congo'],
            ['nombre' => 'República Dominicana'],
            ['nombre' => 'República Sudafricana'],
            ['nombre' => 'Ruanda'],
            ['nombre' => 'Rumanía'],
            ['nombre' => 'Rusia'],
            ['nombre' => 'Samoa'],
            ['nombre' => 'San Cristóbal y Nieves'],
            ['nombre' => 'San Marino'],
            ['nombre' => 'San Vicente y las Granadinas'],
            ['nombre' => 'Santa Lucía'],
            ['nombre' => 'Santo Tomé y Príncipe'],
            ['nombre' => 'Senegal'],
            ['nombre' => 'Serbia'],
            ['nombre' => 'Seychelles'],
            ['nombre' => 'Sierra Leona'],
            ['nombre' => 'Singapur'],
            ['nombre' => 'Siria'],
            ['nombre' => 'Somalia'],
            ['nombre' => 'Sri Lanka'],
            ['nombre' => 'Suazilandia'],
            ['nombre' => 'Sudán'],
            ['nombre' => 'Sudán del Sur'],
            ['nombre' => 'Suecia'],
            ['nombre' => 'Suiza'],
            ['nombre' => 'Surinam'],
            ['nombre' => 'Tailandia'],
            ['nombre' => 'Tanzania'],
            ['nombre' => 'Tayikistán'],
            ['nombre' => 'Timor Oriental'],
            ['nombre' => 'Togo'],
            ['nombre' => 'Tonga'],
            ['nombre' => 'Trinidad y Tobago'],
            ['nombre' => 'Túnez'],
            ['nombre' => 'Turkmenistán'],
            ['nombre' => 'Turquía'],
            ['nombre' => 'Tuvalu'],
            ['nombre' => 'Ucrania'],
            ['nombre' => 'Uganda'],
            ['nombre' => 'Uruguay'],
            ['nombre' => 'Uzbekistán'],
            ['nombre' => 'Vanuatu'],
            ['nombre' => 'Venezuela'],
            ['nombre' => 'Vietnam'],
            ['nombre' => 'Yemen'],
            ['nombre' => 'Yibuti'],
            ['nombre' => 'Zambia'],
            ['nombre' => 'Zimbabue']
        ];

        DB::table('pais')->insert($paises);


        Schema::create('estado', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->foreignId('id_pais')->constrained('pais')->nullable();
            $table->timestamps();
        });

        $estados = [
            ["nombre" => "Aguascalientes", "id_pais" => 118],
            ["nombre" => "Baja California", "id_pais" => 118],
            ["nombre" => "Baja California Sur", "id_pais" => 118],
            ["nombre" => "Campeche", "id_pais" => 118],
            ["nombre" => "Chiapas", "id_pais" => 118],
            ["nombre" => "Chihuahua", "id_pais" => 118],
            ["nombre" => "Coahuila", "id_pais" => 118],
            ["nombre" => "Colima", "id_pais" => 118],
            ["nombre" => "Ciudad de México", "id_pais" => 118],
            ["nombre" => "Durango", "id_pais" => 118],
            ["nombre" => "Estado de México", "id_pais" => 118],
            ["nombre" => "Guanajuato", "id_pais" => 118],
            ["nombre" => "Guerrero", "id_pais" => 118],
            ["nombre" => "Hidalgo", "id_pais" => 118],
            ["nombre" => "Jalisco", "id_pais" => 118],
            ["nombre" => "Michoacan", "id_pais" => 118],
            ["nombre" => "Morelos", "id_pais" => 118],
            ["nombre" => "Nayarit", "id_pais" => 118],
            ["nombre" => "Nuevo León", "id_pais" => 118],
            ["nombre" => "Oaxaca", "id_pais" => 118],
            ["nombre" => "Puebla", "id_pais" => 118],
            ["nombre" => "Queretaro", "id_pais" => 118],
            ["nombre" => "Quintana Roo", "id_pais" => 118],
            ["nombre" => "San Luis Potosí", "id_pais" => 118],
            ["nombre" => "Sinaloa", "id_pais" => 118],
            ["nombre" => "Sonora", "id_pais" => 118],
            ["nombre" => "Tabasco", "id_pais" => 118],
            ["nombre" => "Tamaulipas", "id_pais" => 118],
            ["nombre" => "Tlaxcala", "id_pais" => 118],
            ["nombre" => "Veracruz", "id_pais" => 118],
            ["nombre" => "Yucatán", "id_pais" => 118],
            ["nombre" => "Zacatecas", "id_pais" => 118]
        ];

        foreach ($estados as $estado) {
            DB::table('estado')->insert($estado);
        }

        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('id_pais')->constrained('paises');
            $table->foreignId('id_estado')->constrained('estados');
            $table->timestamps();

            $data = [
                // Aguascalientes
                ['nombre' => 'Aguascalientes', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Asientos', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Calvillo', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Cosío', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Jesús María', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Pabellón de Arteaga', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Rincón de Romos', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'San José de Gracia', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'Tepezalá', 'id_pais' => 118, 'id_estado' => 1],
                ['nombre' => 'El Llano', 'id_pais' => 118, 'id_estado' => 1],
    
                // Baja California
                ['nombre' => 'Ensenada', 'id_pais' => 118, 'id_estado' => 2],
                ['nombre' => 'Mexicali', 'id_pais' => 118, 'id_estado' => 2],
                ['nombre' => 'Tecate', 'id_pais' => 118, 'id_estado' => 2],
                ['nombre' => 'Tijuana', 'id_pais' => 118, 'id_estado' => 2],
                ['nombre' => 'Playas de Rosarito', 'id_pais' => 118, 'id_estado' => 2],
    
                // Baja California Sur
                ['nombre' => 'Comondú', 'id_pais' => 118, 'id_estado' => 3],
                ['nombre' => 'Mulegé', 'id_pais' => 118, 'id_estado' => 3],
                ['nombre' => 'La Paz', 'id_pais' => 118, 'id_estado' => 3],
                ['nombre' => 'Los Cabos', 'id_pais' => 118, 'id_estado' => 3],
                ['nombre' => 'Loreto', 'id_pais' => 118, 'id_estado' => 3],
    
                // Campeche
                ['nombre' => 'Calkiní', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Campeche', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Carmen', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Champotón', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Hecelchakán', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Hopelchén', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Palizada', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Tenabo', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Escárcega', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Calakmul', 'id_pais' => 118, 'id_estado' => 4],
                ['nombre' => 'Candelaria', 'id_pais' => 118, 'id_estado' => 4],

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
