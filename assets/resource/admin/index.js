import { createRoot } from '@wordpress/element';
import  SettingsPage  from './component/SettingPage';
import './index.css';
let root = createRoot( document.getElementById('root') );
root.render(
   <SettingsPage />
)