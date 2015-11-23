/* ALL Session name
	current_q_id = current question id
	user_id = user id
	question_type = current question type. i.e. single, multi chioce.
	question_group = current question group type. i.e. b, e, n, h.
	show_friend_only = save state of view friend ranking only checkbox (true or false). 
	user_rank = save current rank of user.
*/

/* 25 Oct 2015
	1) Change Single Answer "choice" from link to form. So we can add hidden field
	 for point on timing.
	2) Multi Choice's answer can be more than 1. So handle more possible answer.	
*/

/* 31 Oct 2015
	
	// SQL Command to create view for ranking v1
	CREATE VIEW ranking_view
	AS
	SELECT user_id, user_point, (SELECT COUNT(1) FROM summary_point b WHERE b.user_point > a.user_point) + 1 as rank
	FROM summary_point as a;

	// v2
	CREATE VIEW ranking_view
	AS
	SELECT (SELECT COUNT(1) 
       FROM summary_point b 
       WHERE b.user_point > a.user_point) + 1 as rank, user_id, f.fb_name, user_point
	FROM summary_point as a 
	JOIN facebook_user as f 
	ON (f.fb_id = a.user_id)
	ORDER BY rank asc;

	// SQL to find rank
	SELECT rank from ranking_view WHERE user_id = [user_id];

	Temporary set player per page in ranking page to 3 players per page. Next will be 20 players per page.
*/

/* 01 Nov 2015

	// SQL to fetch friend only in rankin section
	SELECT * 
	FROM ranking_view
	WHERE ranking_view.user_id IN (
									SELECT friend_id 
									FROM facebook_friend 
									WHERE fb_id = 10203862441240326 
								  ) OR ranking_view.user_id = 10203862441240326; 

	

*/
 
/*  08 Nov 2015

	// SQL query rank++

	SET @rownum := 0;
	SELECT rank, user_id, f.fb_name, user_point FROM ( 
	     							SELECT @rownum := @rownum +1 AS rank, user_point , user_id
	 								FROM summary_point 
	 								ORDER BY  user_point DESC
								  ) as result JOIN facebook_user as f 
									ON (f.fb_id = user_id)

	// Version 2
	CREATE VIEW ranking_view
	AS
	SELECT (
      SELECT  COUNT(*)
      FROM    summary_point b
      WHERE   (b.user_point, b.user_id) >= (a.user_point, a.user_id)
    ) AS rank,
        user_id,
        f.fb_name, 
        user_point
	FROM summary_point as a 
	JOIN facebook_user as f 
	ON (f.fb_id = a.user_id)
	ORDER BY rank asc;

*/


/**  10 Nov 2015
	Questionair use-sa-bi-li-ty
	 
	
*/