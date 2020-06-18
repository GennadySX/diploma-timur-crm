
import roleList from '../database/Roles'


export const getByRole = (is) => roleList.filter(role => role.name === is  )[0];

