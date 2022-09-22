SELECT * FROM memes WHERE deleted_at IS NULL;

INSERT INTO users(user_name, password, email, is_admin)
VALUES ("Fabianooo", "4d00d79b6733c9cc066584a02ed03410", "fabian.sucholas123@gmail.com", true);

INSERT INTO users(user_name, password, email, is_admin)
VALUES ("Nizeroo22o", "9d4f597a29f2a6d193fe94a53734c0ae", "nizero22opoaniejanie@gmail.com", false);

SELECT m.titile, m.file, m.likes, m.created_at as "date", u1.name as "author", u2.name as "admin" FROM memes "m"
JOIN users "u1" ON m.user_id = u1.id
JOIN users "u2" ON m.admin_id = u2.id
WHERE m.deleted_at IS NULL OFFSET 0 LIMIT 10
