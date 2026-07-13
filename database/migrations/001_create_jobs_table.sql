CREATE TABLE IF NOT EXISTS jobs
(
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    keyword TEXT NOT NULL,

    location TEXT NOT NULL,

    max_results INTEGER NOT NULL,

    include_facebook INTEGER DEFAULT 1,

    include_instagram INTEGER DEFAULT 1,

    include_website INTEGER DEFAULT 1,

    include_email INTEGER DEFAULT 1,

    include_phone INTEGER DEFAULT 1,

    status TEXT NOT NULL,

    created_at TEXT NOT NULL,

    started_at TEXT,

    completed_at TEXT
);