# conveniaslim

API Teste Convenia (Exercício)

Neste documento estão listadas as maneiras de se conectar à API solicitada no exercício.

O link para consumir a API é: http://854e1fca.ngrok.io/conveniaslim/ (link gerado via Ngrok). 
Foi criado um link para teste de conexão: http://854e1fca.ngrok.io/conveniaslim/test que Deverá retornar a mensagem "Application Test: Working" em JSON.
O link padrão, http://854e1fca.ngrok.io/conveniaslim/  se acessado via GET, irá retornar o resultado do exercício proposto no email, também em JSON.

Testando a API com novos grupos e cometas
A API foi feita para permitir que novos grupos e cometas sejam testados, para isso deve-se utilizar a url: http://854e1fca.ngrok.io/conveniaslim/grupos através do método POST e no Body da requisição, deve-se enviar os grupos e cometas em JSON no seguinte formato:
{"cometas":["HALLEY","ENCKE","WOLF","KUSHIDA"],
"grupos":["AMARELO","VERMELHO","PRETO","AZUL"]}

O retorno será feito da mesma forma que na url padrão: 
{"grupos":["VERMELHO"]}

####Observações importantes:
Caso o Body da requisção POST seja nulo, será retornada uma mensagem de erro: {"Application error: The Body Can not be null"}
Caso o número de grupos e cometas não estejam dentro do padrão apresentado, será retornado uma mensagem de erro: {"Application error: The size of both arrays must be equal"}
A API apenas retorna resultados em JSON, portanto analisar os retornos via postman.

###Dúvidas entrar em contato: vtr.gomes@hotmail.com

