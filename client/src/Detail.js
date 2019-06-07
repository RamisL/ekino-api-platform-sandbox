import React from 'react';
import './detail.css';

class Detail extends React.Component {

    constructor(props) {
        super(props);
        this.state = { datas: {} };
        
    }
    ChoixImage = () => {
        const charactersId = this.props.match.params.detailId;
        console.log('id',charactersId);
        if (charactersId%2 == 0){
            const image =  "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f359881d-6bb2-4391-aba6-779f7084edd4/dd3h9xi-fff1be63-75ce-4569-a8f7-cb4bacbe8610.png/v1/fill/w_734,h_1088,strp/captain_marvel___transparent_by_asthonx1_dd3h9xi-pre.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTg5NyIsInBhdGgiOiJcL2ZcL2YzNTk4ODFkLTZiYjItNDM5MS1hYmE2LTc3OWY3MDg0ZWRkNFwvZGQzaDl4aS1mZmYxYmU2My03NWNlLTQ1NjktYThmNy1jYjRiYWNiZTg2MTAucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.RSp_cRcjdmRqwCEosWqpNKYW0ULFg5K_fjX9TQTF2Ko";
            this.setState({ images: image })
        }else{
            const image = "http://pngriver.com/wp-content/uploads/2018/04/Download-Thor-PNG.png";
            this.setState({ images: image })
        }
        
    }
    // Comic = () => {
    //     const { datas } = this.state;
    //     if (datas.comics !== 0){
    //         const comic = datas.map((comics, i) => {
    //             return <option value={comics,id} key={`characters_${i}`}>
    //                 {item.name}
    //             </option>;
    //     }
    // }
   
    fonctionFetch = () => {
        const charactersId = this.props.match.params.detailId;
        const params = {
            method: 'GET',
            mode: 'cors',
            cache: 'default'
        };

        fetch(`https://localhost:8443/characters/${charactersId}`, params)
            .then(function (reponse) {
                return reponse.json()
            })
            .then((data) => {
                console.log('data', data);
                this.setState({ datas: data })
            })
    }
    componentDidMount() {
        console.log(this.state.datas);
        this.fonctionFetch();
        this.ChoixImage();
    }

    render() {
        console.log('props',this.props);
        console.log('state',this.state);
        
        const { datas } = this.state;
        const name = datas.name;
        const id = datas.id;
        const image = this.state.images;
        const descr = datas.description;
        const type = datas["@type"];

        return (
            <div>
                
                <div>
                    <header className="header">
                        <a href="https://localhost/" >
                            <img className="header__img" src="https://sitejerk.com/images/marvel-logo-transparent.png"></img>
                        </a>
                    </header>
                    <section className="body">
                        <div className="body__character">
                            <div className="body__character__name">
                                <h1>
                                <strong>{name}</strong>
                                </h1>
                            </div>
                            
                            <p className="body__character__type">
                                <strong>{type}:</strong> {id}
                            </p>
                            
                            <div className="body__character__desc">
                                <p><strong>Description :</strong> {descr}</p>
                            </div>

                            <div className="body__character__image">     
                                <img src={image}></img>
                            </div>  

                        </div>  
                        <div className="lorem">
                            <div className="lorem__text">

                                <div className="lorem__text__desc">
                                    <p><strong>Description : </strong></p>
                                </div>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lacinia quis nibh nec pharetra. Aenean 
                                    vitae scelerisque lorem. Aenean aliquet elit at arcu convallis, quis pellentesque nisl eleifend. Sed nunc dolor, suscipit sed purus et, porta varius magna. Sed vestibulum dui vel nunc maximus, a laoreet nunc euismod. Duis accumsan dictum sodales. Nullam et sollicitudin nulla, ut consequat nisl.
                                    Cras placerat blandit porta. In venenatis nulla in lectus efficitur efficitur.

                                    Morbi et justo bibendum, iaculis justo a, sodales ipsum. Sed eleifend arcu justo, vel semper neque ultricies in. Cras ut velit et mauris aliquam egestas maximus et urna. Ut mollis euismod semper. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. In quis convallis arcu. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur auctor sapien nibh, nec lacinia metus venenatis tincidunt. Aenean mollis felis elit, eu eleifend dolor viverra et. Morbi et purus nec felis facilisis pellentesque. Pellentesque ut sem sollicitudin, lobortis augue ut, iaculis odio. Donec sed ornare elit,
                                    in rutrum lorem. Duis arcu ante, faucibus a felis a, facilisis laoreet tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                </p>

                            </div>
                        </div>  
                    </section>
                    <section>
                        <footer className="footer">
                                   <img className="footer__image"src="http://www.pngall.com/wp-content/uploads/2016/04/Avengers-PNG.png"></img> 
                        </footer>
                    </section>
                </div>

            </div>    
        );
    }
}
export default Detail;