# **Commit Tracker**

Esta aplicação espera receber alguns parâmetros:
```
- Componente = c
- Versão = v
- Responsável = r
- Status = s
```
Neste formato:
```
/?c=componente&v=version&r=responsavel&s=status
```

Todos os parâmetros são **obrigatórios**.

Ao receber estes valores o sistema guarda as informações num **SQLITE** e podem ser vistas acessando:
```
/lista
```
Também é possível fazer um download das informações da base de dados para um **CSV**:
```
/download
```
Esta aplicação é **Docker** friendly, para isso, basta salvar os arquivos da aplicação no seu diretório de execução e rodar:

```
docker run --rm -p 80:80 -v $(pwd):/var/www/html php:apache
```

A aplicação estará disponível na porta 80 do servidor.
