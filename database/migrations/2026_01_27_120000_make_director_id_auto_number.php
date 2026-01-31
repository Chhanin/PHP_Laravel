<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('directors')) {
            return;
        }

        $driver = DB::getDriverName();

        // MySQL / MariaDB: make the PK auto-increment
        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            // Ensure column is INT, primary key, and auto-increment
            DB::statement("ALTER TABLE directors MODIFY idDirector INT NOT NULL AUTO_INCREMENT");
            return;
        }

        // Oracle (OCI8): use sequence + trigger
        if (in_array($driver, ['oci', 'oci8', 'oracle'], true)) {
            $max = (int) (DB::table('directors')->max('idDirector') ?? 0);
            $startWith = $max + 1;

            // Create sequence (ignore if already exists)
            DB::statement("
                BEGIN
                    EXECUTE IMMEDIATE 'CREATE SEQUENCE directors_iddirector_seq START WITH {$startWith} INCREMENT BY 1 NOCACHE';
                EXCEPTION
                    WHEN OTHERS THEN
                        IF SQLCODE != -955 THEN RAISE; END IF;
                END;
            ");

            // Create trigger to auto-fill idDirector when NULL
            DB::statement("
                BEGIN
                    EXECUTE IMMEDIATE '
                        CREATE OR REPLACE TRIGGER directors_iddirector_bi
                        BEFORE INSERT ON directors
                        FOR EACH ROW
                        BEGIN
                            IF :NEW.idDirector IS NULL THEN
                                SELECT directors_iddirector_seq.NEXTVAL INTO :NEW.idDirector FROM dual;
                            END IF;
                        END;';
                END;
            ");
        }
    }

    public function down(): void
    {
        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE directors MODIFY idDirector INT NOT NULL");
            return;
        }

        if (in_array($driver, ['oci', 'oci8', 'oracle'], true)) {
            DB::statement("
                BEGIN
                    EXECUTE IMMEDIATE 'DROP TRIGGER directors_iddirector_bi';
                EXCEPTION
                    WHEN OTHERS THEN
                        IF SQLCODE != -4080 THEN RAISE; END IF;
                END;
            ");

            DB::statement("
                BEGIN
                    EXECUTE IMMEDIATE 'DROP SEQUENCE directors_iddirector_seq';
                EXCEPTION
                    WHEN OTHERS THEN
                        IF SQLCODE != -2289 THEN RAISE; END IF;
                END;
            ");
        }
    }
};


