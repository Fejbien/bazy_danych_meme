SELECT * FROM memes WHERE deleted_at IS NULL;

INSERT INTO users(user_name, password, email, is_admin)
VALUES ("Fabianooo", "4d00d79b6733c9cc066584a02ed03410", "fabian.sucholas123@gmail.com", true);

INSERT INTO users(user_name, password, email, is_admin)
VALUES ("Nizeroo22o", "9d4f597a29f2a6d193fe94a53734c0ae", "nizero22opoaniejanie@gmail.com", false);

SELECT
    m.title,
    m.file AS "path",
    m.likes,
    m.created_at AS "date",
    u1.user_name AS "author",
    u2.user_name AS "admin"
FROM
    memes AS m
JOIN users AS u1 ON
    m.user_id = u1.id
JOIN users AS u2 ON
    m.admin_id = u2.id
WHERE
    m.deleted_at IS NULL AND 0 LIMIT 10;

SELECT m.title, m.file AS "path", m.likes, m.created_at AS "date", u1.user_name AS "author", u2.user_name AS "admin" FROM memes AS m JOIN users AS u1 ON m.user_id = u1.id JOIN users AS u2 ON m.admin_id = u2.id WHERE m.deleted_at IS NULL AND 0 LIMIT 10

SELECT u.user_name, c.content, c.created_at, c.modified_at, c.deleted_at FROM `comments` AS c JOIN users AS u ON c.user_id = u.id WHERE c.meme_id = 2;