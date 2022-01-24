DROP TABLE IF EXISTS messages;

CREATE TABLE IF NOT EXISTS messages (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      title TEXT, 
      message TEXT, 
      time INTEGER);

INSERT INTO messages (title, message, time)
  VALUES ("this is travis", "this is the message", DateTime('now'));

INSERT INTO messages (title, message, time)
  VALUES ("this is dave", "this is the Dave message 55", DateTime('now'));  