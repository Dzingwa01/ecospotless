import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import withStyles from '@material-ui/core/styles/withStyles';
import { ValidatorForm, TextValidator} from 'react-material-ui-form-validator';
import axios from 'axios';
import MUIDataTable from "mui-datatables";
import Button from '@material-ui/core/Button';
import AddIcon from '@material-ui/icons/Add';
import Modal from '@material-ui/core/Modal';
import Checkbox from '@material-ui/core/Checkbox';

function rand() {
    return Math.round(Math.random() * 20) - 10;
}

function getModalStyle() {
    const top = 50 + rand();
    const left = 50 + rand();

    return {
        top: `${top}%`,
        left: `${left}%`,
        transform: `translate(-${top}%, -${left}%)`,
    };
}
const styles = theme => ({
    paper: {
        marginTop: theme.spacing.unit * 8,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        padding: `${theme.spacing.unit * 2}px ${theme.spacing.unit * 3}px ${theme.spacing.unit * 3}px`,
    },
    fabButton:{
        position: 'absolute',
        bottom: theme.spacing.unit * 4,
        right: theme.spacing.unit * 4,
    },
    row: {
        flexGrow: 1,
    },

    form: {
        width: '100%', // Fix IE11 issue.
        marginTop: theme.spacing.unit,
    },
modalPaper:{
    position: 'absolute',
    width: 400,
    backgroundColor: theme.palette.background.paper,
    boxShadow: theme.shadows[5],
    padding: theme.spacing.unit * 4,
}

});

class Roles extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loading:true,
            role:{
                name:'',
                permissions:[],
            },
            permissions:[],
            open: false,
        };

        this.handleChange =this.handleChange.bind(this);
        this.handleSubmit =this.handleSubmit.bind(this);
        this.addRole = this.addRole.bind(this);
        this.getPermissions = this.getPermissions.bind(this);
        this.handleOpen =this.handleOpen.bind(this);
        this.handleClose =this.handleClose.bind(this);
        this.toggleCheckbox = this.toggleCheckbox.bind(this);
    }

    componentDidMount() {
        this.getPermissions();
    }

    componentWillUnmount() {

    }

    handleOpen(){
        this.setState({ open: true });
    };

    handleClose(){
        this.setState({ open: false });
    };

    getPermissions(){
        let component = this;
        let permissions = this.state.permissions;
        console.log("cur user",permissions);
        axios.get('/roles/create').then(function(response){
            console.log('Check out the permissions',response.data);
            component.state.permissions = response.data;
            component.state.loading = false;
            console.log("the state is",component.state);
        }).catch((error)=>{
            this.setState({message:"Error occured please contact support@ecospotless.co.za",open:true});
        });
    }

    addRole(){
        alert("clicked");
    }

    handleChange (event){
        let name = event.target.name;
        let user = this.state.user;
        user[name] = event.target.value;
        this.setState({user:user});
    }

    toggleCheckbox(event){

    }

    handleSubmit (e){
        e.preventDefault();
        let component = this;
        let role = this.state.user;
        console.log("cur user",role);
        // axios.post('/roles',role).then(function(response){
        //     console.log('Check out the response',response.data);
        //     // component.setState({message:response.data.message,open:true});
        //
        // }).catch((error)=>{
        //
        //     this.setState({message:"Error occured please contact support@ecospotless.co.za",open:true});
        //
        // });
    }

    render() {
        const {classes} = this.props;
        const {role,permission,loading} = this.state;
        const columns = ["Name","Created At"];
        const data = [
            ["Joe James",""]
        ];
        const options = {
            filterType: 'checkbox',
        };
        return (
            <div className={classes.root}>
            <Paper  elevation={2}>
                <div>
                    <Button variant="fab" color="secondary" aria-label="Add" className={classes.fabButton} onClick={this.handleOpen}>
                        <AddIcon />
                    </Button>
                </div>
                <MUIDataTable
                    title={"Roles List"}
                    data={data}
                    columns={columns}
                    options={options}
                />
                <Modal
                    aria-labelledby="roles-modal-title"
                    aria-describedby="role-modal-description"
                    open={this.state.open}
                    onClose={this.handleClose}
                >
                    <div style={getModalStyle()} className={classes.modalPaper}>
                        <Typography variant="h6" id="modal-title">
                            Add New Role
                        </Typography>
                        {!loading &&(
                        <ValidatorForm
                            ref="form"
                            onSubmit={this.handleSubmit}
                            onError={errors => console.log(errors)}
                        >
                            <TextValidator
                                label="Role Name"
                                onChange={this.handleChange}
                                name="name"
                                value={role.name}
                                validators={['required']}
                                errorMessages={['this field is required']}
                            />
                            <br/>
                            <div>{
                                permissions.map((permission, index) => {
                                    <label>
                                        <input
                                            id={permission.id}
                                            type="checkbox"
                                            checked="false"
                                            value={permission.id}
                                            onChange={this.toggleCheckbox}
                                        />
                                        {permission.name}
                                    </label>
                                })
                            }
                            </div>
                            <Button type="submit">Submit</Button>
                        </ValidatorForm>)
                        }
                    </div>
                </Modal>
            </Paper>
            </div>
        );
    }
}
Roles.propTypes={
    classes: PropTypes.object.isRequired,
}
export default withStyles(styles)(Roles);