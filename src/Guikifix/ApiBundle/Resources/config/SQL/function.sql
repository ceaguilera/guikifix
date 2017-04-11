CREATE OR REPLACE FUNCTION get_job_type_categories(job_type_id INT) RETURNS json AS $$
DECLARE
	current_tree RECORD;
	aux_response text;
	aux_text text;
	aux_count int;
	lvl_job_type int;
BEGIN
	aux_count := 0;
	aux_response := '';

	FOR current_tree IN SELECT * FROM job_type_category as jt WHERE jt.parent_id = job_type_id order by id LOOP

		aux_text := 
			('{"id":' || current_tree.id 
			|| ',"lvl":' || current_tree.lvl 
			|| ',"title":"' || current_tree.title 
			|| '","children":' || get_job_type_categories(current_tree.id)
			|| '}');
	
		IF aux_count = 0 THEN
			aux_response := aux_response || aux_text;
			aux_count := aux_count + 1;
		ELSE
			aux_response := aux_response || ',' || aux_text;
		END IF;		
	END LOOP;

	return '[' || aux_response || ']';
END;
$$ LANGUAGE plpgsql;
