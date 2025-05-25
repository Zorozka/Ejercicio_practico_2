public function up()
{
    Schema::create('departamentos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('ubicacion');
        $table->timestamps();
    });
}