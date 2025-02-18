import { useEffect, useState } from 'react'
import './App.css'
import api from './axios/axios'

interface Task {
  title: string;
  description: string;
}

function App() {
  const [tasks, setTasks] = useState<Task[]>([]);
  const [title, setTitle] = useState('');
  const [description, setDescription] = useState('');

  useEffect(() => {
    getTasks();
  }, []);

  const getTasks = async () => {
    try {
      const response = await api.get('/tasks');
      setTasks(response.data.data);
    } catch (error) {
      console.error('Error fetching tasks:', error);
    }
  };

  const createTask = async () => {
    try {
      const params = { title, description };
      await api.post('/tasks', params);
      setTitle('');
      setDescription('');
      getTasks();
    } catch (error) {
      console.error('Error creating task:', error);
    }
  };

  return (
    <>
      <div>
        <input 
          value={title} 
          onChange={(e) => setTitle(e.target.value)} 
          className="border" 
          type="text" 
          placeholder="Enter task title"
        />
        <input 
          value={description} 
          onChange={(e) => setDescription(e.target.value)} 
          className="border" 
          type="text" 
          placeholder="Enter task description"
        />
        <button onClick={createTask}>Submit</button>
      </div>

      <div>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            {tasks.length > 0 ? (
              tasks.map((task, index) => (
                <tr key={index}>
                  <td>{task.title}</td>
                  <td>{task.description}</td>
                </tr>
              ))
            ) : (
              <tr>
                <td colSpan={2}>No tasks available</td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
    </>
  );
}

export default App;
