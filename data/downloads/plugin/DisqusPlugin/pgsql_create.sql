INSERT INTO dtb_bloc (device_type_id, bloc_id, bloc_name, tpl_path, filename, create_date, update_date, php_path, deletable_flg)
VALUES
(10, (SELECT MAX(max) FROM (SELECT MAX(bloc_id)+1 AS max FROM dtb_bloc WHERE device_type_id = 10) AS tmp1), 'DISQUSフォームブロック', 'disqus.tpl', 'disqus', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'frontparts/bloc/disqus.php', 0);


