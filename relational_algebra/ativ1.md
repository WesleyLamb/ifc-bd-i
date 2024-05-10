1) Retorne o nome do material cujo preço seja menor do que 5
pi({dsmaterial}(sigma{vlunitario > 5})(material))

2) Retorne o nome do fornecedor e o valor total da ordem de compra cujo código do fornecedor seja = 2
pi({nmfornecedor,vltotalordem}(sigma{fornecedor.codfornecedor = 2}(fornecedor,ordemcompra)))

3) Retorne o endereço de todos os fornecedores que estão em alguma ordem de compra

4) Retorne a quantidade comprada e o nome do material cujo material se encontra em alguma ordem de compra

5) Retornar o nome do material e o valor unitário de todos os materiais que se encontram em alguma ordem de compra e cujo preço unitário seja menor do que 10