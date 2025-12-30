-- Migration: 1760114652437_create_users"
CREATE TYPE roles AS ENUM ('admin', 'student', 'standard');

CREATE TABLE IF NOT EXISTS public.users (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid (),
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  role roles DEFAULT 'standard',
  img_name varchar(255) DEFAULT 'default-user.png',
  created_at TIMESTAMP
  WITH
    TIME ZONE DEFAULT NOW (),
    updated_at TIMESTAMP
  WITH
    TIME ZONE DEFAULT NOW ()
);
