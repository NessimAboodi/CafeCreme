public function up(): void
{
Schema::table('menu_items', function (Blueprint $table) {
$table->string('image')->nullable()->after('price'); // Ajoute le champ image après le prix
});
}
