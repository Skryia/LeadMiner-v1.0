CREATE TABLE IF NOT EXISTS logs
(
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    job_id INTEGER NOT NULL,

    type TEXT NOT NULL,

    message TEXT NOT NULL,

    created_at TEXT NOT NULL,

    FOREIGN KEY(job_id)
        REFERENCES jobs(id)
        ON DELETE CASCADE
);