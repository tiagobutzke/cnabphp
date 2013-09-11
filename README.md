cnabphp
=======

Um leitor de arquivos CNAB bancários

-- 
### Uso

``` php
$cnab = new Cnab(
    new SplFileObject('./arquivo/do/cnab.RET'), 
    ConfigBradesco::getLocations()
);

$dados = $cnab->getData();

var_dump($dados);
```
--

PS1.: Criado somente para o banco bradesco ainda;

PS2.: Não sei se as mesmas configurações do Bradesco servem para os CNABs de outros bancos.
