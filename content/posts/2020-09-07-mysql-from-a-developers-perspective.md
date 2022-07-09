---
author: isotopp
date: "2020-09-07T09:18:16Z"
feature-img: mysql.jpg
tags:
- lang_en
- mysql
- database
- innodb
- erklaerbaer
- mysqldev
title: MySQL from a Developers Perspective
---
So this has turned into a small series, explaining how to work with MYSQL from a developers perspective. This post is intended as a directory for the individual articles. It will be amended and re-dated as necessary.

The code for the series is also available in [isotopp/mysql-dev-examples](https://github.com/isotopp/mysql-dev-examples.git) on GitHub.

The Tag [#mysqldev](https://blog.koehntopp.info/tags/#mysqldev) will reference all articles from this series.

- [MySQL Transactions - the physical side](../2020-07-27-mysql-transactions).
  Looking at how MySQL InnoDB handles transactions on the physical media, enabling rollback and commit. Introduces a number of important concepts: The Undo-Log, the Redo-Log, the Doublewrite Buffer, and the corrosponding in memory structures, the Log Buffer and the InnoDB Buffer Pool, as well as the concept of a page.

- [MySQL Commit Size and Speed](../2020-07-27-mysql-commit-size-and-speed).
  This article has code in Github, in mysql-commit-size/. We benchmark MySQL write speed as a function of number of rows written per commit.

- [MySQL Connection Scoped State](../2020-07-28-mysql-connection-scoped-state).
  Looking at things that are stateful and attached to a MySQL connection, and are lost on disconnect.

- [MySQL Transactions - the logical view](../2020-07-29-mysql-transactions-the-logical-view).
  This article introduces the concept of `TRANSACTION ISOLATION LEVEL` and how pushing things into the Undo-Log, while a necessity to implement `ROLLBACK` for a Writer, enables features for a Reader.

- [MySQL Transactions - writing data](../2020-07-30-mysql-transactions---writing-data).
  This article has code in Github, in mysql-transactions-counter. We increment a counter in the database, with multiple concurrent writers, and see what happens.

- [MySQL: Locks and Deadlocks](../2020-08-01-mysql-locks-and-deadlocks).
  When changing multiple rows, it is possible to take out locks in transactions one by one. Depending on how that is done, it may come to deadlocks, and server-initiated rollbacks. When that happens, the transaction must be retried.

- [MySQL Deadlocks with INSERT](../2020-08-02-mysql-deadlocks-with-insert)
  When using the obscure transaction isolation level `SERIALIZABLE`, it may happen that a single `INSERT` can deadlock. Here is how, and why.

- [MySQL Foreign Keys and Foreign Key Constraints](../2020-08-03-mysql-foreign-keys-and-foreign-key-constraints)
  When establishing relationships between tables, you are doing this by putting one tables primary keys into another tables columns. Enforcing valid pointers between tables seems like a sexy idea, but is painful, and maybe hurts more than it helps.

- [MySQL Foreign Key Constraints and Locking](../2020-08-04-mysql-foreign-key-constraints-and-locking)
  Looking at tables with foreign key constraints, we check what happens to table and row locks, and how this is different from before.

- [MySQL: Some Character Set Basics](../2020-08-18-mysql-character-sets)
  A collection and re-evaluation of things I wrote about MySQL character sets in the past, updated to match MySQL 8.

- [MySQL: NULL is NULL](../2020-08-25-null-is-null)
  Understanding the handling of NULL values in SQL. NULL is not false, nor None/nil/undef, but is a thing specific to SQL.

- [MySQL: Basic usage of the JSON data type](../2020-09-04-mysql-json-data-type)
  MySQL 8 gains support of a JSON data type. How to get data in and out of JSON fields.
