public function up()
{
    Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('email')->unique();
        $table->string('dni')->unique();
        $table->foreignId('departamento_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}