    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateAdvancesTable extends Migration
    {
        public function up()
        {
            Schema::create('advances', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->decimal('amount', 10, 2);
                $table->string('date_wish');
                $table->string('department');
                $table->text('description')->nullable();
                $table->boolean('chief_staff_status')->default(false);
                $table->boolean('head_department_status')->default(false);
                $table->boolean('financial_director_status')->default(false);
                $table->boolean('manager_director_status')->default(false);
                $table->boolean('accepted')->default(false);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        public function down()
        {
            Schema::dropIfExists('advances');
        }
    }
    