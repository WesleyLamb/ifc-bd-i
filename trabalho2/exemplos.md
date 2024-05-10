# Alunos

- Valdir Rugiski Jr
- Wesley Ricardo Lamb

# Exemplo DDL:
- Create, Alter, Drop

```sql
CREATE TABLE `auditorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auditoria` text COLLATE utf8mb4_general_ci NOT NULL,
  `tabela` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

# Exemplo DCL
- Grant

```sql
GRANT Select ON trabalho2.movimentacoes_itens TO 'vendedores'@'%';
GRANT Trigger ON trabalho2.movimentacoes_itens TO 'vendedores'@'%';
```

# Exemplo DML
- Insert, Update, Delete

```sql
INSERT INTO `cargos` VALUES
    (1,'Sócio-administrador','2024-05-09 22:20:40'),
    (2,'Gerente','2024-05-09 22:20:48'),
    (3,'Supervisor','2024-05-09 22:21:03'),
    (4,'Vendedor','2024-05-09 22:21:18'),
    (5,'TI2','2024-05-09 22:21:18');
```

# Exemplo DTL
- Start Transaction, Commit, Rollback
```sql
START TRANSACTION;

insert into movimentacoes (funcionario_id, cliente_fornecedor_id, tipo_movimentacao) values (1, 1, 'E');

set @ultimaMovimentacao = LAST_INSERT_ID();

insert into movimentacoes_itens (movimentacao_id, produto_id, quantidade, preco_custo, preco_venda) values (@ultimaMovimentacao, 1, 1, 2.5, 5);

select * from movimentacoes m;

-- COMMIT;
-- ROLLBACK;

```

# Exemplo DQL
- Select
```sql
select
    `cf`.`razao_social` AS `razao_social`,
    count(`m`.`id`) AS `qtde`,
    coalesce(`m`.`tipo_movimentacao`, 'E') AS `tipo_movimentacao`
from
    (`trabalho2`.`clientes_fornecedores` `cf`
left join `trabalho2`.`movimentacoes` `m` on
    ((`m`.`cliente_fornecedor_id` = `cf`.`id`)))
where
    (`m`.`tipo_movimentacao` = 'E')
group by
    `m`.`cliente_fornecedor_id`,
    `m`.`tipo_movimentacao`,
    `cf`.`razao_social`
union all
select
    `cf`.`razao_social` AS `razao_social`,
    count(`m`.`id`) AS `qtde`,
    coalesce(`m`.`tipo_movimentacao`, 'S') AS `tipo_movimentacao`
from
    (`trabalho2`.`clientes_fornecedores` `cf`
left join `trabalho2`.`movimentacoes` `m` on
    ((`m`.`cliente_fornecedor_id` = `cf`.`id`)))
where
    (`m`.`tipo_movimentacao` = 'S')

group by
    `m`.`cliente_fornecedor_id`,
    `m`.`tipo_movimentacao`,
    `cf`.`razao_social`;
```