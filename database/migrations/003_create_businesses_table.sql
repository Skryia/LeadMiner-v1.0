CREATE TABLE IF NOT EXISTS businesses
(
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    job_id INTEGER NOT NULL,

    name TEXT NOT NULL,

    website TEXT,

    facebook TEXT,

    instagram TEXT,

    email TEXT,

    phone TEXT,

    status TEXT,

    created_at TEXT NOT NULL,

    FOREIGN KEY(job_id)
        REFERENCES jobs(id)
        ON DELETE CASCADE
);