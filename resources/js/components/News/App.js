import React from 'react';
import ReactDOM from 'react-dom';

import {Leading} from './Leading.js'
import {Body} from './Body.js'

function App() {
    return (
        <div className="container">
            <h1>NEWS THE WORLD</h1>
            <Leading/>
            <Body/>
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
