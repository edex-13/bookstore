use bbpejicnyxguh6h8nstd;

create table editorials(
  id varchar(100) not null primary key unique,
  `name` varchar(100) not null
);

create table authors(
  id varchar(100) not null primary key unique,
  `name` varchar(100) not null
);

create table books(
  id varchar(100) not null primary key unique,
  isbn varchar(100) not null unique,
  title varchar(100) not null unique,
  price float not null unique,
  id_author varchar(100) not null,
  id_editorial varchar(100) not null,
  FOREIGN KEY (id_author) REFERENCES authors (id),
  FOREIGN KEY (id_editorial) REFERENCES editorials (id)
);

create table invoices(
  id varchar(100) not null primary key unique,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `client` varchar(100) not null,
  id_book varchar(100) not null,
  FOREIGN KEY (id_book) REFERENCES books (id)
);

create table roles(
  id int not null primary key unique,
  `name` varchar(100) not null
);

create table users(
  id varchar(100) not null primary key unique,
  `name` varchar(100) not null,
  `username` varchar(100) not null unique,
  `password` varchar(100) not null,
  id_role int not null,
  FOREIGN KEY (id_role) REFERENCES roles (id)
)