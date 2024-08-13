
var offset = 6;
document.getElementById('viewMore').addEventListener('click', function () {
    fetch('controller/searchArticles.php?offset=' + offset)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                var articlesContainer = document.querySelector('.container-articles');
                data.forEach(function (article) {

                    var articleA = document.createElement('a');
                    articleA.classList.add('button-click');
                    articleA.href = 'artigo.php?article_id=' + article.article_id

                    var articleArt = document.createElement('article');
                    articleArt.classList.add('article-destinationGuide');

                    var articleImg = document.createElement('img');
                    articleImg.classList.add('article-img');
                    articleImg.src = "./media/" + article.article_img1

                    var articleSpan = document.createElement('span');
                    articleSpan.classList.add('article-date');
                    articleSpan.textContent = article.article_data

                    var articleH2 = document.createElement('h2');
                    articleH2.classList.add('article-title');
                    articleH2.textContent = article.article_title

                    var articleDiv = document.createElement('div');
                    articleDiv.classList.add('minhaDiv');
                    articleDiv.textContent = article.article_text1;

                    // Crie elementos HTML para exibir os valores (exemplo: título e conteúdo)
                    //var titleElement = document.createElement('h2');
                    // titleElement.textContent = title;

                    //var contentElement = document.createElement('p');
                    //contentElement.textContent = content;


                    articlesContainer.appendChild(articleA);
                    articleA.appendChild(articleArt);
                    articleArt.appendChild(articleImg);
                    articleArt.appendChild(articleSpan);
                    articleArt.appendChild(articleH2);
                    articleArt.appendChild(articleDiv);

                    var divs = document.querySelectorAll('.minhaDiv'); // Seleciona todas as divs com a classe "minhaDiv"
                    var limiteCaracteres = 400; // Defina o número máximo de caracteres que você deseja exibir

                    divs.forEach(function (div) {
                        var texto = div.textContent.trim(); // Remove espaços em branco no início e no final do texto

                        if (texto.length > limiteCaracteres) {
                            texto = texto.slice(0, limiteCaracteres) + ' [...]'; // Adicione " etc" ao final do texto
                            div.textContent = texto;
                        }
                    });


                });
                offset += data.length;
            } else {
                document.getElementById('viewMore').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Ocorreu um erro ao buscar os artigos:', error);
        });
    });
