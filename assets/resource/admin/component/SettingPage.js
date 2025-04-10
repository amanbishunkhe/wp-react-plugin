import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';
import { Card, CardBody,TabPanel,CardDivider,Flex,FlexItem,Button } from '@wordpress/components';
import Panel from './Panel';

function SettingsPage(){

    const [ activeTab,setActiveTab ] = useState('panel');

    return(
        <form className='example-wp-settings'> 
            <Card>
                <CardBody>
                    <h1>{ __( 'Example WP Settings Settings' ) }</h1>
                    <TabPanel
						className="example-wp-settings-tab-panel"
                        onSelect = { ( tabName )=>{
                            setActiveTab( tabName );
                        } }
						initialTabName={ activeTab }
						tabs={ [
							{
								name: 'panel',
								title: 'Example Panel',
								content: <Panel/>,
							},
                            {
								name: 'panel2',
								title: 'Example Panel2',
								content: < Panel />,
							},
						] }
					>
						{ ( tab ) => <>{ tab.content }</> }
					</TabPanel>  
                </CardBody>

                <CardDivider />

                <CardBody  >
                    <Flex>
                        <FlexItem>
                            <Button variant="primary" type="submit" onClick={ saveAccount }>
								Save Changes
							</Button>
                        </FlexItem>
                    </Flex>
                </CardBody>
            </Card>
        </form>
    );
}

export default SettingsPage;