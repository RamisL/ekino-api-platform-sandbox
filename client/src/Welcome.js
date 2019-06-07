import React from 'react';
import { Link } from 'react-router-dom';
import ButtonsGroup from './ButtonsGroup';
import HelpButton from './HelpButton';
import Slack from './Stack';
import Sto from './Sto';
import './welcome.css';
class Welcome extends React.Component {

    constructor(props) {
        super(props);
        this.state = { datas: [], charactersId: "" };
    }

    changeEventHandler = (event) => {
        if (!event.target.value) {
            console.log('Please Select One');
        } else {
            this.setState({ charactersId: event.target.value });

        }
    }

    fonctionFetch = () => {

        const params = {
            method: 'GET',
            mode: 'cors',
            cache: 'default'
        };

        fetch('https://localhost:8443/characters', params)
            .then(function (reponse) {
                return reponse.json()
            })
            .then((data) => {
                this.setState({ datas: data['hydra:member'] })
            })
    }
    componentDidMount() {
        this.fonctionFetch();
    }

    render() {
        const { datas, charactersId } = this.state;

        const characters = datas.map((item, i) => {
            return <option value={item.id} key={`characters_${i}`}>
                {item.name}
            </option>;
        });

        return (
            <div>
                <div className="welcome">
                    <header className="welcome__top">
                        <a
                            target="_blank"
                            rel="noopener noreferrer"
                            href="https://api-platform.com"
                        >

                        </a>
                        <a
                            target="_blank"
                            rel="noopener noreferrer"
                            href="https://les-tilleuls.coop"
                        >

                        </a>
                    </header>
                    <section className="welcome__main">

                        <div className="main__content">
                            <h1>
                                Welcome to <strong>Marvel API </strong>!
                        </h1>
                            <div className="liste">
                                <div className="welcome__img">
                                    <img className="marvel" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Marvel_Studios_2016_logo.svg/langfr-280px-Marvel_Studios_2016_logo.svg.png"></img>
                                </div>
                                <select className="listee" onChange={this.changeEventHandler}>

                                    <option> --- Chose your hero     --- </option>
                                    {characters}
                            </select>
                            <Link to={`/detail/${charactersId}`}><button className="buttonDev" name="button">Découvrir</button></Link>
                        </div>
                    <div className="main__other">
                        <h2>Available services:</h2>
                        <div className="other__bloc">
                            <div className="other__circle">
                                <div className="container">
                                    <img className="cptmarvel" src="http://www.pngmart.com/files/9/Captain-Marvel-PNG-Transparent-Image.png"></img>
                                </div>
                            </div>
                            <div className="other__content">
                                <h3>API</h3>
                                <ButtonsGroup
                                    httpLink={`http://${document.domain}:8080`}
                                    httpsLink={`https://${document.domain}:8443`}
                                />
                                <h3>Cached API</h3>
                                <ButtonsGroup
                                    httpLink={`http://${document.domain}:8081`}
                                    httpsLink={`https://${document.domain}:8444`}
                                />
                            </div>
                        </div>
                        <div className="other__bloc">
                            <div className="other__circle">
                                <div className="container">
                                    <img className="vision" src="http://www.pngmart.com/files/6/Marvel-Vision-PNG-Transparent.png"></img>
                                </div>
                            </div>
                            <div className="other__content">
                                <h3>Admin</h3>
                                <ButtonsGroup
                                    httpLink={`http://${document.domain}:81`}
                                    httpsLink={`https://${document.domain}:444`}
                                />
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            <div className="welcome__help">
                <h2>Need help?</h2>
                <HelpButton
                    url="https://stackoverflow.com/questions/tagged/api-platform.com"
                    Image={Sto}
                    title="Ask your questions on Stack Overflow!"
                />
                <HelpButton
                    url="https://api-platform.com/support"
                    Image={Slack}
                    title="Chat with the community on Slack!"
                />
            </div>
            <img className="all" src="http://www.pngall.com/wp-content/uploads/2016/04/Avengers-PNG.png"></img>
            </div >
        </div >    
        );
    }
}

export default Welcome;


