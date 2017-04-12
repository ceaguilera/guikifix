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

#############################################################################3

CREATE OR REPLACE FUNCTION get_job_status_categories() RETURNS json AS $$
DECLARE
	current_tree RECORD;
	current_tree_child RECORD;
	aux_response text;
	aux_response_child text;
	aux_text text;
	aux_text_child text;
	aux_count int;
	aux_count_child int;
BEGIN
	aux_count := 0;
	aux_response := '';

	FOR current_tree IN SELECT * FROM job_status_category as jt WHERE jt.lvl = 1 or jt.lvl = 3 order by id LOOP

		aux_text := 
			('{"id":' || current_tree.id 
				|| ',"lvl":' || current_tree.lvl 
				|| ',"title":"' || current_tree.title 
				|| '","children":[');
				
		aux_count_child := 0; 
		aux_response_child = '';
		FOR current_tree_child IN select * from job_status_category  as jtc where jtc.parent_id = current_tree.id LOOP
			aux_text_child := 
				('{"id":' || current_tree_child.id 
				|| ',"lvl":' || current_tree_child.lvl 
				|| ',"title":"' || current_tree_child.title 
				|| '"}');
						
			IF aux_count_child = 0 THEN
				aux_response_child := aux_response_child || aux_text_child;
				aux_count_child := aux_count_child + 1;
			ELSE
				aux_response_child := aux_response_child || ',' || aux_text_child;
			END IF;		
			
		END LOOP;

		aux_text := aux_text || aux_response_child ||']}';

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

select get_job_status_categories();
