SELECT u.name, u.email, t.title, t.completed
FROM tasks t
	INNER JOIN users u ON (t.user_id = u.id)
WHERE t.completed = 0
ORDER BY t.created_at DESC
