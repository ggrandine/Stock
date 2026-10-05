<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER trg_log_estoque
            AFTER UPDATE ON material
            FOR EACH ROW
            BEGIN
                IF OLD.quantidade <> NEW.quantidade THEN
                    INSERT INTO log_estoque(id_material, quantidade_anterior, quantidade_nova)
                    VALUES(NEW.id_material, OLD.quantidade, NEW.quantidade);
                END IF;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE RegistrarSaida(
                IN p_material INT,
                IN p_usuario INT,
                IN p_quantidade INT
            )
            BEGIN
                DECLARE estoque_atual INT;

                SELECT quantidade INTO estoque_atual
                FROM material
                WHERE id_material = p_material;

                IF estoque_atual >= p_quantidade THEN

                    UPDATE material
                    SET quantidade = quantidade - p_quantidade
                    WHERE id_material = p_material;

                    INSERT INTO movimentacao(tipo, quantidade, id_material, id_usuario)
                    VALUES('SAIDA', p_quantidade, p_material, p_usuario);

                ELSE

                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Estoque insuficiente.';

                END IF;
            END
        ");
    }

    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS trg_log_estoque");
        DB::unprepared("DROP PROCEDURE IF EXISTS RegistrarSaida");
    }
};