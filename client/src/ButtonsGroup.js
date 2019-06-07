import React from 'react';

const ButtonsGroup = ({ httpLink, httpsLink }) => (
    <div className="buttons__group">
        <a
        target="_blank"
        rel="noopener noreferrer"
        href={httpLink}
        className="other__button"
        >
           http         
        </a>
        <div className="buttons__or" />
        <a
        target="_blank"
        rel="noopener noreferrer"
        href={httpsLink}
        className="other__button"
        >
            https
        </a>
    </div>
);
export default ButtonsGroup ;